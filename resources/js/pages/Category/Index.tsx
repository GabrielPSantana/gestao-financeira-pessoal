type Category = {
    id: number;
    name: string;
    image?: string | null;
};

type Props = {
    categories: Category[];
};

export default function Index({ categories }: Props) {
    return (
        <div>
            <h1>Lista de Categorias</h1>

            <ul>
                {categories.map(category => (
                    <li key={category.id}>{category.name}</li>
                ))}
            </ul>
        </div>
    );
}
