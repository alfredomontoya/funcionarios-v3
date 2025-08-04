interface SearchFormProps {
    search: string;
    setSearch: (value: string) => void;
    onSubmit: (e: React.FormEvent) => void;
}

export default function SearchForm({ search, setSearch, onSubmit }: SearchFormProps) {
    return (
        <form onSubmit={onSubmit} className="mb-4 flex gap-2">
            <input
                type="text"
                placeholder="Buscar..."
                value={search}
                onChange={(e) => setSearch(e.target.value)}
                className="border border-gray-300 rounded px-3 py-2"
            />
            <button
                type="submit"
                className="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Buscar
            </button>
        </form>
    );
}
