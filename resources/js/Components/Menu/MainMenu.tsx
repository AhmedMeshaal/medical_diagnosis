import MainMenuItem from '@/Components/Menu/MainMenuItem';
import { BriefcaseMedical, Building, CircleGauge, PersonStanding, Printer, Users } from 'lucide-react';

interface MainMenuProps {
  className?: string;
}

export default function MainMenu({ className }: MainMenuProps) {
  return (
    <div className={className}>
      <MainMenuItem
        text="Dashboard"
        link="dashboard"
        icon={<CircleGauge size={20} />}
      />
      <MainMenuItem
        text="Contact"
        link="contacts"
        icon={<BriefcaseMedical size={20} />}
      />
      <MainMenuItem
        text="Organization"
        link="organizations"
        icon={<BriefcaseMedical size={20} />}
      />
      <MainMenuItem
        text="Body Area"
        link="area"
        icon={<BriefcaseMedical size={20} />}
      />
      <MainMenuItem
        text="Lesions"
        link="lesion"
        icon={<BriefcaseMedical size={20} />}
      />
    </div>
  );
}
