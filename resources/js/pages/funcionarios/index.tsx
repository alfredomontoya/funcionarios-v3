import { Head, router } from '@inertiajs/react';
import { useState } from 'react';
import SearchForm from './SearchForm';
import SearchResult from './SearchResult';
import AppLayout from '@/layouts/app-layout';
import { BreadcrumbItem } from '@/types';
import { AppSidebarHeader } from '@/components/app-sidebar-header';
import ImportForm from './Import';

interface Funcionario {
    id: number;
    ci: string;
    nombres: string;
    apellidos: string;
    cargo: string;
    responsable: string;
    telresponsable: string;
}

interface Props {
    funcionarios: Funcionario[];
    filters: {
        search?: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Funcionarios',
        href: '/funcionarios',
    },
];

export default function FuncionariosIndex({ funcionarios, filters }: Props) {
    const [search, setSearch] = useState(filters.search || '');
    // const [funcionarios, setFuncionarios] = useState(initialData);

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault(); // evita recargar
        router.get(route('funcionarios.index'), { search }, { replace: true, preserveState: true });
    };

    const hasSearch = filters.search && filters.search.trim() !== '';

    return (
        <AppLayout breadcrumbs={breadcrumbs}>

            <div className="p-6 min-h-[calc(100vh-65px)] flex flex-col items-center" style={{ background: 'rgb(178, 198, 184)'}}>
                {/* <Head title="Listado de Funcionarios" /> */}
                {/* <AppSidebarHeader breadcrumbs={breadcrumbs} /> */}

                {/* Formulario de importación */}
                {/* <ImportForm onImportSuccess={(nuevosDatos) => setFuncionarios(nuevosDatos)} /> */}

                <SearchForm
                    search={search}
                    setSearch={setSearch}
                    onSubmit={handleSubmit}
                />

                {hasSearch && (
                    <div className="mt-6 w-full max-w-4xl">
                        <SearchResult funcionarios={funcionarios} />
                    </div>
                )}
            </div>
        </AppLayout>
    );
}
