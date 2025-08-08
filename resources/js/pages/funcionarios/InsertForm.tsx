import { useState } from "react";
import axios from "axios";
import AppLayout from "@/layouts/app-layout";
import { BreadcrumbItem } from "@/types";

interface InsertFormProps {
  onInsertSuccess: (funcionarios: any[]) => void;
}

export default function InsertForm({ onInsertSuccess }: InsertFormProps) {
  const [form, setForm] = useState({
    ci: "",
    nombres: "",
    apellidos: "",
    cargo: "",
    edificio: "",
    responsable: "",
    telresponsable: ""
  });

  const [loading, setLoading] = useState(false);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    try {
      const res = await axios.post("/funcionarios", form, {
        headers: {
          "X-CSRF-TOKEN": (document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement)?.content || "",
        }
      });
      alert(res.data.message);
      // onInsertSuccess(res.data.funcionarios); // actualiza tabla
      setForm({ ci: "", nombres: "", apellidos: "", cargo: "", edificio: "", responsable: "", telresponsable: "" });
    } catch (error: any) {
      console.error(error.response?.data || error.message);
      alert("Error al guardar funcionario");
    } finally {
      setLoading(false);
    }
  };

  const breadcrumbs: BreadcrumbItem[] = [
      {
          title: 'Funcionarios',
          href: '/funcionarios',
      },
  ];
  

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <form onSubmit={handleSubmit} className="p-4 rounded shadow mb-4">
        <div className="grid grid-cols-2 gap-4">
          <input name="ci" value={form.ci} onChange={handleChange} placeholder="CI" className="border p-2 rounded" required />
          <input name="nombres" value={form.nombres} onChange={handleChange} placeholder="Nombres" className="border p-2 rounded" required />
          <input name="apellidos" value={form.apellidos} onChange={handleChange} placeholder="Apellidos" className="border p-2 rounded" required />
          <input name="cargo" value={form.cargo} onChange={handleChange} placeholder="Cargo" className="border p-2 rounded" required />
          <input name="edificio" value={form.edificio} onChange={handleChange} placeholder="Edificio" className="border p-2 rounded" />
          <input name="responsable" value={form.responsable} onChange={handleChange} placeholder="Responsable" className="border p-2 rounded" />
          <input name="telresponsable" value={form.telresponsable} onChange={handleChange} placeholder="Teléfono Encargado" className="border p-2 rounded" />
        </div>
        <button type="submit" className="mt-4 bg-blue-500 text-white px-4 py-2 rounded disabled:opacity-50" disabled={loading}>
          {loading ? "Guardando..." : "Guardar"}
        </button>
      </form>
    </AppLayout>
  );
}
