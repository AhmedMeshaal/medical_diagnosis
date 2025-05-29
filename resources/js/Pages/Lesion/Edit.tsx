import { usePage } from '@inertiajs/react';
import { Lesion } from '@/types';
import React from 'react';
import MainLayout from '@/Layouts/MainLayout';

const Edit = () => {
  const { lesion } = usePage<{ lesion: Lesion }>().props;

  return (
    <div>
      <span> EDIT </span>
    </div>
  );
};

Edit.layout = (page: React.ReactNode) => <MainLayout children={page} />;

export default Edit;
