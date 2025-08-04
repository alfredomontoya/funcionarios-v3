import { useState } from "react";
import axios from "axios";

interface ImportFormProps {
  onImportSuccess: (funcionarios: any[]) => void;
}

export default function ImportForm({ onImportSuccess }: ImportFormProps) {
  const [file, setFile] = useState<File | null>(null);
  const [loading, setLoading] = useState(false);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!file) return;

    setLoading(true);
    const formData = new FormData();
    formData.append("file", file);

    try {
      const res = await axios.post("/funcionarios/import", formData, {
        headers: { "Content-Type": "multipart/form-data" },
      });

      alert(res.data.message);
      onImportSuccess(res.data.funcionarios); // Actualiza la tabla
    } catch (error) {
      alert("Error al importar el archivo");
    } finally {
      setLoading(false);
    }
  };

  return (
    <form onSubmit={handleSubmit} className="p-4 border rounded mb-4">
      <input
        type="file"
        accept=".xlsx,.xls,.csv"
        onChange={(e) => setFile(e.target.files?.[0] || null)}
        className="mb-2 block"
      />
      <button
        type="submit"
        className="bg-green-500 text-white px-4 py-2 rounded disabled:opacity-50"
        disabled={loading}
      >
        {loading ? "Importando..." : "Importar Excel"}
      </button>
    </form>
  );
}
