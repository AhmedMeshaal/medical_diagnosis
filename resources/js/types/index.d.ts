import { Config } from 'ziggy-js';

export interface User {
  id: number;
  name: string;
  first_name: string;
  last_name: string;
  email: string;
  owner: string;
  photo: string;
  deleted_at: string;
  account: Account;
}

export interface Account {
  id: number;
  name: string;
  users: User[];
  contacts: Contact[];
  organizations: Organization[];
}

export interface Contact {
  id: number;
  name: string;
  first_name: string;
  last_name: string;
  email: string;
  phone: string;
  address: string;
  city: string;
  region: string;
  country: string;
  postal_code: string;
  deleted_at: string;
  organization_id: number;
  organization: Organization;
}

export interface Organization {
  id: number;
  name: string;
  email: string;
  phone: string;
  address: string;
  city: string;
  region: string;
  country: string;
  postal_code: string;
  deleted_at: string;
  contacts: Contact[];
}

export interface Lesion {
  id: number;
  date_event: string;
  onset: string;
  when_occurred: string;
  fixture_minute: number;
  contact: string;
  contacttype_id: number;
  subsequent_cat: string;
  time_loss: number;
  area_id: number;
  playeraction_id: number;
  osiiscode_id: number;
  player_id: number;
  illness_id: number;
  pathologytype_id: number;
  area: Area;
  player: Player;
  playeraction: PlayerAction;
}

export interface Area {
  id: number;
  name: string;
  lesions: Lesion[];
}

export interface PlayerAction {
  id: number;
  action: string;
  lesions: Lesion[];
}

export interface Illness {
  id: number;
  illness_name: string;
}

export interface ContactType {
  id: number;
  name: string;
}

export interface OsiisCode {
  id: number;
  Abr: string;
  diagnosis: string;
}

export interface Player {
  id: number;
  spl_id: number;
  name: string;
  age_bracket: string;
  DOB: string;
  lesions: Lesion[];
}

export interface PathologyType {
  id: number;
  pathology_type: string;
  issue: string;
}

export type PaginatedData<T> = {
  data: T[];
  links: {
    first: string;
    last: string;
    prev: string | null;
    next: string | null;
  };

  meta: {
    current_page: number;
    from: number;
    last_page: number;
    path: string;
    per_page: number;
    to: number;
    total: number;

    links: {
      url: null | string;
      label: string;
      active: boolean;
    }[];
  };
};

export type PageProps<
  T extends Record<string, unknown> = Record<string, unknown>
> = T & {
  auth: {
    user: User;
  };
  flash: {
    success: string | null;
    error: string | null;
  };
  ziggy: Config & { location: string };
};

