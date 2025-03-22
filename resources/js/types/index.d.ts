import type { PageProps } from '@inertiajs/core';
import type { Config } from 'ziggy-js';

export interface SharedData extends PageProps {
    name: string;
    auth: Auth;
    ziggy: Config & { location: string };
}

export interface Auth {
    user: User;
}
export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
}
