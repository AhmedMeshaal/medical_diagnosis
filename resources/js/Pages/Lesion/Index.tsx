import { Link, usePage } from '@inertiajs/react';
import MainLayout from '@/Layouts/MainLayout';
import { Lesion, PaginatedData } from '@/types';
import FilterBar from '@/Components/FilterBar/FilterBar';
import Table from '@/Components/Table/Table';
import Pagination from '@/Components/Pagination/Pagination';
import { Trash2 } from 'lucide-react';

function Index() {
  const { lesions } = usePage<{
    lesions: PaginatedData<Lesion>;
  }>().props;

  const {
    data,
    meta: { links }
  } = lesions;

  console.log(data);

  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Lesions</h1>
      <div className="flex items-center justify-between mb-6">
        <FilterBar />
      </div>
      <Table
        columns={[
          {
            label: 'Onset',
            name: 'onset',
            renderCell: row => (
              <>
                {row.onset}
              </>
            )
          },
          { label: 'Area', name: 'area.name' },
          { label: 'When Occurred', name: 'when_occurred' },
          { label: 'Illness', name: 'illness.illness_name' },
          { label: 'Date Event', name: 'date_event' },
          { label: 'Player SPL_ID', name: 'player.spl_id' },
          { label: 'Player Action', name: 'playeraction.action' }
        ]}
        rows={data}
        getRowDetailsUrl={row => route('lesion.create', row.id)}
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
  <MainLayout title="Body Area" children={page} />
);

export default Index;
