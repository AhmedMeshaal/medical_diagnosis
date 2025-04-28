import MainLayout from '@/Layouts/MainLayout';
import bodyImg from '../../../../storage/app/public/bodyshape.png';
import Table from '@/Components/Table/Table';
import { Link } from '@inertiajs/react';

function DiagnosisPage() {
  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Diagnosis</h1>
    </div>
  );
}

/**
 * Persistent Layout (Inertia.js)
 *
 * [Learn more](https://inertiajs.com/pages#persistent-layouts)
 */
DiagnosisPage.layout = (page: React.ReactNode) => (
  <MainLayout title="Diagnosis" children={page} />
);

export default DiagnosisPage;
