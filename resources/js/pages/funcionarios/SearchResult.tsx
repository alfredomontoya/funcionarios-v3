interface Funcionario {
    id: number;
    ci: string;
    nombres: string;
    apellidos: string;
    cargo: string;
    responsable: string;
    telresponsable: string;
}

interface SearchResultProps {
    funcionarios: Funcionario[];
}

export default function SearchResult({ funcionarios }: SearchResultProps) {
    return (
        <table className="table-auto w-full ">
            <thead className="border-b-2 border-gray-700">
                <tr>
                    <th className="px-4 py-2">CI</th>
                    <th className="px-4 py-2">Nombres</th>
                    <th className="px-4 py-2">Apellidos</th>
                    <th className="px-4 py-2">Cargo</th>
                    <th className="px-4 py-2">Encargado</th>
                    <th className="px-4 py-2">Teléfono</th>
                </tr>
            </thead>
            <tbody className="divide-y divide-gray-300">
                {funcionarios.length > 0 ? (
                    funcionarios.map((p) => (
                        <tr key={p.id} className="hover:bg-green-100 dark:hover:bg-black">
                            <td className="px-4 py-2">{p.ci}</td>
                            <td className="px-4 py-2">{p.nombres}</td>
                            <td className="px-4 py-2">{p.apellidos}</td>
                            <td className="px-4 py-2">{p.cargo??'nd'}</td>
                            <td className="px-4 py-2">{p.responsable??'nd'}</td>
                            <td className="px-4 py-2">{p.telresponsable??'nd'}</td>
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
