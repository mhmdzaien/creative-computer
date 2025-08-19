export namespace User {
    export const ROLE_ADMIN = 1;
    export const ROLE_Teknisi = 2;
    export const roleList = {
        [ROLE_ADMIN]: 'Admin',
        [ROLE_Teknisi]: 'Teknisi',
    };
}

export type User = {
    id: number;
    name: string;
    email: string;
    password: string;
    role: number;
    created_at: string;
};