import MainLayout from '@/Layouts/MainLayout';
import { Link, usePage } from '@inertiajs/react';
import { Area, PaginatedData } from '@/types';
import FilterBar from '@/Components/FilterBar/FilterBar';
import Table from '@/Components/Table/Table';

const Index = () => {
  const { areas } = usePage<{
    areas: PaginatedData<Area>;
  }>().props;

  const {
    data,
    meta: { links }
  } = areas;

  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Body Areas</h1>
      <div className="flex items-center justify-between mb-6">
        <FilterBar />
        <Link
          className="btn-indigo focus:outline-none"
          href={route('area.create')}
        >
          <span>Create </span>
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
                {row.img && (
                <img
                  src={row.img}
                  alt={row.name}
                  className="w-5 h-5 mr-2 rounded-full"
                />
                )}
                <>{row.name}</>
                  {/*<Trash2 />*/}
              </>
            )
          },
          {
            label: 'Body-Area',
            name: 'img',
            renderCell: row => (
              <>
              {row.img && (
                <img
                  src={row.img}
                  alt={row.name}
                  className="w-5 h-5 mr-2 rounded-full"
                />
                )}
              </>
            )
          }
        ]}
        rows={data}
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
  <MainLayout title="Area" children={page} />
);

export default Index;
