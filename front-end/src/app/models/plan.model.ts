
export interface Plan {
    id: bigint;
    name: string;
    description: string;
    type: 'consultor' | 'lojista';
    price: number;
    // tslint:disable-next-line:variable-name
    created_at: Date;
    // tslint:disable-next-line:variable-name
    updated_at: Date;
}