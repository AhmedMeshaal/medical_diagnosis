import { Link, usePage } from '@inertiajs/react';
import MainLayout from '@/Layouts/MainLayout';
import { Injury, PaginatedData } from '@/types';
import FilterBar from '@/Components/FilterBar/FilterBar';
import Table from '@/Components/Table/Table';
import Pagination from '@/Components/Pagination/Pagination';

function Index() {
  const { injuries } = usePage<{
    injuries: PaginatedData<Injury>;
  }>().props;

  const {
    data,
    meta: { links }
  } = injuries;

  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Injury</h1>
      <div className="flex items-center justify-between mb-6">
        <FilterBar />
      </div>
      <Table
        columns={[
          {
            label: 'Name',
            name: 'name',
            renderCell: row => (
              <>
                {row.name}
              </>
            )
          },
        ]}
        rows={data}
        // getRowDetailsUrl={row => route('injury.edit', row.id)}
      />
      <Pagination links={links} />
    </div>
  );
}

/**
 * Persistent Layout (Inertia.js)
 *
 * [Learn more](https://inertiajs.com/pages#persistent-layouts)
 */
Index.layout = (page: React.ReactNode) => (
  <MainLayout title="Injury" children={page} />
);

export default Index;
