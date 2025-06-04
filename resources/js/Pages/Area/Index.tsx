import MainLayout from '@/Layouts/MainLayout';
import { Link, usePage } from '@inertiajs/react';
import { Area, PaginatedData } from '@/types';
import FilterBar from '@/Components/FilterBar/FilterBar';
import { Trash2 } from 'lucide-react';
import Table from '@/Components/Table/Table';

const Index = () => {
  const { areas } = usePage<{
    areas: PaginatedData<Area>;
  }>().props;

  const {
    data,
    // meta: { links }
  } = areas;

  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Body Areas</h1>
      <div className="flex items-center justify-between mb-6">
        <FilterBar />
        <Link
          className="btn-indigo focus:outline-none"
          href="#"
        >
          <span>Create</span>
          <span className="hidden md:inline">Body Area</span>
        </Link>
      </div>
      <Table
        columns={[
          {
            label: 'Name',
            name: 'name',
            renderCell: row => (
              <>
                {row.name}
                {/*<Trash2 />*/}
              </>
            )
          },
        ]}
        rows={data}
        getRowDetailsUrl={row => route('lesion.create', row.id)}
      />
    </div>
  )
}
/**
 * Persistent Layout (Inertia.js)
 *
 * [Learn more](https://inertiajs.com/pages#persistent-layouts)
 */
Index.layout = (page: React.ReactNode) => (
  <MainLayout title="LIST OF BODY AREAS" children={page} />
);

export default Index;
