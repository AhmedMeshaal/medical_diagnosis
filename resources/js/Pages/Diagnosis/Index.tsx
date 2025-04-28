import MainLayout from '@/Layouts/MainLayout';

function DiagnosisPage() {
  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Diagnosis</h1>
      <p className="mb-12 leading-normal">Not implemented</p>
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
