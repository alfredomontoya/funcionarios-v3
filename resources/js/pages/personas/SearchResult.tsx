interface Persona {
    id: number;
    ci: string;
    nombres: string;
    apellidos: string;
    cargo: string;
    encargado: string;
    telefonoencargado: string;
}

interface SearchResultProps {
    personas: Persona[];
}

export default function SearchResult({ personas }: SearchResultProps) {
    return (
        <table className="table-auto border-collapse border border-gray-300 w-full">
            <thead>
                <tr className="bg-gray-100">
                    <th className="border border-gray-300 px-4 py-2">CI</th>
                    <th className="border border-gray-300 px-4 py-2">Nombres</th>
                    <th className="border border-gray-300 px-4 py-2">Apellidos</th>
                    <th className="border border-gray-300 px-4 py-2">Cargo</th>
                    <th className="border border-gray-300 px-4 py-2">Encargado</th>
                    <th className="border border-gray-300 px-4 py-2">Teléfono Encargado</th>
                </tr>
            </thead>
            <tbody>
                {personas.length > 0 ? (
                    personas.map((p) => (
                        <tr key={p.id}>
                            <td className="border border-gray-300 px-4 py-2">{p.ci}</td>
                            <td className="border border-gray-300 px-4 py-2">{p.nombres}</td>
                            <td className="border border-gray-300 px-4 py-2">{p.apellidos}</td>
                            <td className="border border-gray-300 px-4 py-2">{p.cargo}</td>
                            <td className="border border-gray-300 px-4 py-2">{p.encargado}</td>
                            <td className="border border-gray-300 px-4 py-2">{p.telefonoencargado}</td>
                        </tr>
                    ))
                ) : (
                    <tr>
                        <td
                            colSpan={6}
                            className="border border-gray-300 px-4 py-2 text-center"
                        >
                            No se encontraron resultados
                        </td>
                    </tr>
                )}
            </tbody>
        </table>
    );
}
