<template>
  <v-container>
    <v-card class="mx-auto" max-width="1200">
      <v-card-title class="d-flex align-center justify-space-between">
        <span class="text-h5">User Management</span>
        <v-btn color="primary" @click="openAddDialog">
          <v-icon left>mdi-plus</v-icon>
          Add User
        </v-btn>
      </v-card-title>
      
      <v-card-text>
        <!-- Search Bar -->
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search users..."
          single-line
          hide-details
          class="mb-4"
        ></v-text-field>

        <!-- Data Table -->
        <v-data-table
          :headers="headers"
          :items="users"
          :search="search"
          :loading="loading"
          class="elevation-1"
        >
          <template v-slot:item.role="{ item }">
            <v-chip
              :color="getRoleColor(item.role)"
              dark
              small
            >
              {{ getRoleText(item.role) }}
            </v-chip>
          </template>

          <template v-slot:item.email_verified_at="{ item }">
            <v-chip
              :color="item.email_verified_at ? 'success' : 'warning'"
              dark
              small
            >
              {{ item.email_verified_at ? 'Verified' : 'Unverified' }}
            </v-chip>
          </template>

          <template v-slot:item.created_at="{ item }">
            {{ formatDate(item.created_at) }}
          </template>

          <template v-slot:item.actions="{ item }">
            <v-icon
              small
              class="mr-2"
              @click="editUser(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
              small
              @click="deleteUser(item)"
            >
              mdi-delete
            </v-icon>
          </template>
        </v-data-table>
      </v-card-text>
    </v-card>


    <!-- Snackbar for notifications -->
    <v-snackbar
      v-model="snackbar.show"
      :color="snackbar.color"
      timeout="3000"
    >
      {{ snackbar.message }}
      <template v-slot:action="{ attrs }">
        <v-btn
          text
          v-bind="attrs"
          @click="snackbar.show = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </v-container>
</template>

<script>
import { ref, reactive, onMounted } from 'vue'

export default {
  name: 'UserManagement',
  setup() {
    // Reactive data
    const dialog = ref(false)
    const deleteDialog = ref(false)
    const search = ref('')
    const valid = ref(false)
    const loading = ref(false)
    const saving = ref(false)
    const isEditing = ref(false)
    
    const users = ref([])
    const userToDelete = ref(null)
    
    const snackbar = reactive({
      show: false,
      message: '',
      color: 'success'
    })

    // Form data
    const editedUser = reactive({
      id: null,
      name: '',
      email: '',
      password: '',
      role: 1,
      email_verified: false
    })

    const defaultUser = {
      id: null,
      name: '',
      email: '',
      password: '',
      role: 1,
      email_verified: false
    }

    // Table headers
    const headers = [
      { text: 'ID', value: 'id', sortable: true },
      { text: 'Name', value: 'name', sortable: true },
      { text: 'Email', value: 'email', sortable: true },
      { text: 'Role', value: 'role', sortable: true },
      { text: 'Email Status', value: 'email_verified_at', sortable: true },
      { text: 'Created At', value: 'created_at', sortable: true },
      { text: 'Actions', value: 'actions', sortable: false }
    ]

    // Role options
    const roleOptions = [
      { text: 'User', value: 1 },
      { text: 'Admin', value: 2 },
      { text: 'Super Admin', value: 3 }
    ]

    // Validation rules
    const nameRules = [
      v => !!v || 'Name is required',
      v => (v && v.length >= 2) || 'Name must be at least 2 characters'
    ]

    const emailRules = [
      v => !!v || 'Email is required',
      v => /.+@.+\..+/.test(v) || 'Email must be valid'
    ]

    const passwordRules = [
      v => !!v || 'Password is required',
      v => (v && v.length >= 6) || 'Password must be at least 6 characters'
    ]

    const roleRules = [
      v => !!v || 'Role is required'
    ]

    // Methods
    const showSnackbar = (message, color = 'success') => {
      snackbar.message = message
      snackbar.color = color
      snackbar.show = true
    }

    const getRoleColor = (role) => {
      const colors = {
        1: 'primary',
        2: 'orange',
        3: 'red'
      }
      return colors[role] || 'grey'
    }

    const getRoleText = (role) => {
      const roles = {
        1: 'User',
        2: 'Admin',
        3: 'Super Admin'
      }
      return roles[role] || 'Unknown'
    }

    const formatDate = (dateString) => {
      if (!dateString) return 'N/A'
      return new Date(dateString).toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      })
    }

    const fetchUsers = async () => {
      loading.value = true
      try {
        // Simulate API call - replace with actual API endpoint
        await new Promise(resolve => setTimeout(resolve, 1000))
        
        // Mock data - replace with actual API response
        users.value = [
          {
            id: 1,
            name: 'John Doe',
            email: 'john@example.com',
            role: 2,
            email_verified_at: '2024-01-15 10:30:00',
            created_at: '2024-01-01 08:00:00',
            updated_at: '2024-01-15 10:30:00'
          },
          {
            id: 2,
            name: 'Jane Smith',
            email: 'jane@example.com',
            role: 1,
            email_verified_at: null,
            created_at: '2024-01-02 09:15:00',
            updated_at: '2024-01-02 09:15:00'
          }
        ]
        
        showSnackbar('Users loaded successfully')
      } catch (error) {
        showSnackbar('Error loading users', 'error')
        console.error('Error fetching users:', error)
      } finally {
        loading.value = false
      }
    }

    const openAddDialog = () => {
      isEditing.value = false
      Object.assign(editedUser, defaultUser)
      dialog.value = true
    }

    const editUser = (user) => {
      isEditing.value = true
      Object.assign(editedUser, {
        ...user,
        password: '',
        email_verified: !!user.email_verified_at
      })
      dialog.value = true
    }

    const closeDialog = () => {
      dialog.value = false
      Object.assign(editedUser, defaultUser)
    }

    const saveUser = async () => {
      if (!valid.value) return
      
      saving.value = true
      try {
        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 1000))
        
        if (isEditing.value) {
          // Update existing user
          const index = users.value.findIndex(u => u.id === editedUser.id)
          if (index !== -1) {
            const updatedUser = {
              ...users.value[index],
              name: editedUser.name,
              email: editedUser.email,
              role: editedUser.role,
              email_verified_at: editedUser.email_verified ? new Date().toISOString() : null,
              updated_at: new Date().toISOString()
            }
            
            // Only update password if provided
            if (editedUser.password) {
              updatedUser.password = editedUser.password
            }
            
            users.value[index] = updatedUser
          }
          showSnackbar('User updated successfully')
        } else {
          // Add new user
          const newUser = {
            id: users.value.length + 1,
            name: editedUser.name,
            email: editedUser.email,
            password: editedUser.password,
            role: editedUser.role,
            email_verified_at: null,
            created_at: new Date().toISOString(),
            updated_at: new Date().toISOString()
          }
          users.value.push(newUser)
          showSnackbar('User created successfully')
        }
        
        closeDialog()
      } catch (error) {
        showSnackbar('Error saving user', 'error')
        console.error('Error saving user:', error)
      } finally {
        saving.value = false
      }
    }

    const deleteUser = (user) => {
      userToDelete.value = user
      deleteDialog.value = true
    }

    const confirmDelete = async () => {
      try {
        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 500))
        
        const index = users.value.findIndex(u => u.id === userToDelete.value.id)
        if (index !== -1) {
          users.value.splice(index, 1)
        }
        
        showSnackbar('User deleted successfully')
        deleteDialog.value = false
        userToDelete.value = null
      } catch (error) {
        showSnackbar('Error deleting user', 'error')
        console.error('Error deleting user:', error)
      }
    }

    // Lifecycle
    onMounted(() => {
      fetchUsers()
    })

    return {
      // Data
      dialog,
      deleteDialog,
      search,
      valid,
      loading,
      saving,
      isEditing,
      users,
      userToDelete,
      snackbar,
      editedUser,
      headers,
      roleOptions,
      
      // Validation rules
      nameRules,
      emailRules,
      passwordRules,
      roleRules,
      
      // Methods
      getRoleColor,
      getRoleText,
      formatDate,
      
      openAddDialog,
      editUser,
      closeDialog,
      saveUser,
      deleteUser,
      confirmDelete
    }
  }
}
</script>

<style scoped>
.v-card {
  margin-top: 20px;
}

.v-data-table {
  margin-top: 10px;
}

.text-h5 {
  font-weight: 500;
}
</style>