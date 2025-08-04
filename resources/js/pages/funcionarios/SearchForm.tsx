import { useState } from 'react';
import { Search, X } from 'lucide-react';
import { Input } from '@/components/ui/input';

interface SearchFormProps {
    search: string;
    setSearch: (value: string) => void;
    onSubmit: (e: React.FormEvent) => void;
}

export default function SearchForm({ search, setSearch, onSubmit }: SearchFormProps) {
    const [isFocused, setIsFocused] = useState(false);
    const hasSearch = search.trim().length > 0;

    return (
        <div
            className={`transition-all duration-500 flex flex-col items-center w-full ${
                hasSearch ? 'mt-4' : 'mt-32'
            }`}
        >
            <div
                className={`transition-all duration-300 font-bold text-center ${
                hasSearch? 'mt-6 mb-4 text-2xl' : 'mt-24 mb-8 text-4xl'
                } text-red-600 dark:text-red-400`}
            >
                {/* Puedes reemplazar por una imagen SVG del logo Laravel */}
                Consulta<span className="text-gray-700 dark:text-gray-300">Funcionarios</span><br></br>
                <span className="text-gray-700 dark:text-gray-300 text-2xl">
                    Gobierno Municipal Autonomo<br></br>
                    de Santa Cruz de la Sierra
                </span>
            </div>
            {/* Logo */}
            {!hasSearch && (
                <img
                    src="/images/fiesta.png"
                    alt="Logo"
                    className="mb-6 w-64"
                />
            )}

            {/* Barra de búsqueda */}
            <form
                onSubmit={(e) => {
                    e.preventDefault(); // Evita recargar la página
                    onSubmit(e); // Ejecuta la búsqueda solo aquí
                }}
                className={`flex items-center w-full max-w-xl border rounded-full shadow-sm bg-white px-4 py-2 transition-all duration-300 ${
                    isFocused ? 'ring-2 ring-blue-500' : ''
                }`}
            >
                {/* Icono de búsqueda al inicio */}
                <Search className="text-gray-400 w-5 h-5 mr-2" />

                
                {/* Input */}
                <input
                    type="text"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                    onFocus={() => setIsFocused(true)}
                    onBlur={() => setIsFocused(false)}
                    placeholder="Buscar funcionario..."
                    className="w-full outline-none text-lg"
                />

                {/* Botón borrar */}
                {hasSearch && (
                    <button
                        type="button"
                        onClick={() => setSearch('')}
                        className="p-1 text-gray-400 hover:text-gray-600"
                        title="Borrar"
                    >
                        <X className="w-5 h-5" />
                    </button>
                )}

                {/* Botón submit */}
                <button
                    type="submit"
                    className="ml-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 transition"
                    title="Buscar"
                >
                    <Search className="w-5 h-5" />
                </button>
            </form>
        </div>
    );
}
