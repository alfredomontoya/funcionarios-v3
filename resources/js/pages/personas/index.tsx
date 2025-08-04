import { Head, router } from '@inertiajs/react';
import { useState } from 'react';
import SearchForm from './SearchForm';
import SearchResult from './SearchResult';

interface Persona {
    id: number;
    ci: string;
    nombres: string;
    apellidos: string;
    cargo: string;
    encargado: string;
    telefonoencargado: string;
}

interface Props {
    personas: Persona[];
    filters: {
        search?: string;
    };
}

export default function PersonasIndex({ personas, filters }: Props) {
    const [search, setSearch] = useState(filters.search || '');

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        router.get(route('personas.index'), { search });
    };

    return (
        <div className="p-6">
            <Head title="Listado de Personas" />
            <h1 className="text-2xl font-bold mb-4">Listado de Personas</h1>

            <SearchForm
                search={search}
                setSearch={setSearch}
                onSubmit={handleSubmit}
            />

            <SearchResult personas={personas} />
        </div>
    );
}
