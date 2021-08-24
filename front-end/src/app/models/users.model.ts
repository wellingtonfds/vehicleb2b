
export interface User {
    id: bigint;
    name: string;
    email: string;
    password: string;
    type: 'lojista' | 'consultor';
    // tslint:disable-next-line:variable-name
    created_at: Date;
    // tslint:disable-next-line:variable-name
    updated_at: Date;
}
