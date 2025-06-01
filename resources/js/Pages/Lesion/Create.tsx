import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { Area, ContactType, Illness, Lesion, OsiisCode, Player, PlayerAction } from '@/types';
import React from 'react';
import MainLayout from '@/Layouts/MainLayout';
import SelectInput from '@/Components/Form/SelectInput';
import FieldGroup from '@/Components/Form/FieldGroup';
import TextInput from '@/Components/Form/TextInput';
import LoadingButton from '@/Components/Button/LoadingButton';
import { DatepickerInput } from '@/Components/Form/DatepickerInput';

const Create =  () => {
  const { lesion, areas, illness, contact_types, player_actions, osiis_codes, players } = usePage<{
    lesion: Lesion;
    areas: Area[];
    illness: Illness[];
    contact_types: ContactType[];
    player_actions: PlayerAction[];
    osiis_codes: OsiisCode[];
    players: Player[];
  }>().props;

  const { props } = usePage();

  const { data, setData, errors, post, processing } = useForm({
    name: '',
    area_id: lesion.area_id || '',
    date_event: '',
    problem_type: '',
    onset: '',
    when_occurred: '',
    fixture_minute: '',
    contact: '',
    contact_type_id: '',
    subsequent_cat: '',
    time_loss: '',
    illness_id: '',
    player_action_id: '',
    osiiscode_id: '',
    player_id: '',
  });

  console.log(players);
    // @ts-ignore
  data.area_id = props.areaID;


    function handleSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault();
    post(route('lesion.store'));
  }

  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">
        <Link
          href={route('area')}
          className="text-indigo-600 hover:text-indigo-700"
        >
          Player Injury
        </Link>
        <span className="font-medium text-indigo-600"> /</span> Create
      </h1>
      <div className="max-w-3xl overflow-hidden bg-white rounded shadow">
        <form onSubmit={handleSubmit}>
          <div className="grid gap-8 p-8 lg:grid-cols-2">
            <FieldGroup
              label="Select Player SPL ID"
              name="player_id"
              error={errors.player_id}
            >
              <SelectInput
                name="player_id"
                error={errors.player_id}
                value={data.player_id}
                onChange={e => setData('player_id', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  ...players.map(player => ({
                    value: String(player.id),
                    label: 'NAME-' + player.name + ' SPL ID - ' + player.spl_id
                  }))
                ]}
              />
            </FieldGroup>

            <FieldGroup
              label="Body Area"
              name="area_id"
              error={errors.area_id}
            >
              <SelectInput
                name="area_id"
                error={errors.area_id}
                value={data.area_id}
                onChange={e => setData('area_id', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  ...areas.map(area => ({
                    value: String(area.id),
                    label: area.name
                  }))
                ]}
              />
            </FieldGroup>

            <FieldGroup label="Date Event" name="date_event" error={errors.date_event}>
              <TextInput
                name="date_event"
                type="date"
                error={errors.date_event}
                value={data.date_event}
                onChange={e => setData('date_event', e.target.value)}
              />
            </FieldGroup>

            <FieldGroup
              label="Problem Type"
              name="illness_id"
              error={errors.illness_id}
            >
              <SelectInput
                name="illness_id"
                error={errors.illness_id}
                value={data.illness_id}
                onChange={e => setData('illness_id', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  ...illness.map(illness => ({
                    value: String(illness.id),
                    label: illness.illness_name
                  }))
                ]}
              />
            </FieldGroup>

            <FieldGroup label="On-Set" name="onset" error={errors.onset}>
              <SelectInput
                name="onset"
                error={errors.onset}
                value={data.onset}
                onChange={e => setData('onset', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  {
                    value: 'Sudden-onset',
                    label: 'Sudden'
                  },
                  {
                    value: 'Gradual-onset',
                    label: 'Gradual'
                  }
                ]}
              />
            </FieldGroup>

            <FieldGroup label="When Occurred" name="when_occurred" error={errors.when_occurred}>
              <SelectInput
                name="when_occurred"
                error={errors.when_occurred}
                value={data.when_occurred}
                onChange={e => setData('when_occurred', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  {
                    value: 'Match',
                    label: 'Match'
                  },
                  {
                    value: 'Training',
                    label: 'Training'
                  },
                  {
                    value: 'Other',
                    label: 'Other'
                  }
                ]}
              />
            </FieldGroup>

            <FieldGroup label="Date Event" name="fixture_minute" error={errors.fixture_minute}>
              <TextInput
                name="fixture_minute"
                type="number"
                error={errors.fixture_minute}
                value={data.fixture_minute}
                onChange={e => setData('fixture_minute', e.target.value)}
              />
            </FieldGroup>

            <FieldGroup label="Contact" name="contact" error={errors.onset}>
              <SelectInput
                name="contact"
                error={errors.onset}
                value={data.onset}
                onChange={e => setData('onset', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  {
                    value: 'Direct Contact',
                    label: 'Direct Contact'
                  },
                  {
                    value: 'No Contact',
                    label: 'No Contact'
                  }
                ]}
              />
            </FieldGroup>

            <FieldGroup label="Contact Type" name="contact_type_id" error={errors.contact_type_id}>
              <SelectInput
                name="contact_type_id"
                error={errors.contact_type_id}
                value={data.contact_type_id}
                onChange={e => setData('contact_type_id', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  ...contact_types.map(contact_types => ({
                    value: String(contact_types.id),
                    label: contact_types.name
                  }))
                ]}
              />
            </FieldGroup>

            <FieldGroup label="Subsequent Cat" name="subsequent_cat" error={errors.subsequent_cat}>
              <SelectInput
                name="subsequent_cat"
                error={errors.subsequent_cat}
                value={data.subsequent_cat}
                onChange={e => setData('subsequent_cat', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  {
                    value: 'index',
                    label: 'index'
                  },
                  {
                    value: 'recurrence',
                    label: 'recurrence'
                  },
                  {
                    value: 'exacerbation',
                    label: 'exacerbation'
                  },
                  {
                    value: 'subsequent new',
                    label: 'subsequent new'
                  },
                  {
                    value: 'subsequent local',
                    label: 'subsequent local'
                  },
                  {
                    value: 'unknown',
                    label: 'unknown'
                  }
                ]}
              />
            </FieldGroup>

            <FieldGroup label="Time Loss" name="time_loss" error={errors.time_loss}>
              <TextInput
                name="time_loss"
                type="time"
                error={errors.time_loss}
                value={data.time_loss}
                onChange={e => setData('time_loss', e.target.value)}
              />
            </FieldGroup>

            <FieldGroup label="Player Action" name="player_action_id" error={errors.player_action_id}>
              <SelectInput
                name="player_action_id"
                error={errors.player_action_id}
                value={data.player_action_id}
                onChange={e => setData('player_action_id', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  ...player_actions.map(plyact => ({
                    value: String(plyact.id),
                    label: plyact.action
                  }))
                ]}
              />
            </FieldGroup>

            <FieldGroup label="Osiis Code" name="osiiscode_id" error={errors.osiiscode_id}>
              <SelectInput
                name="osiiscode_id"
                error={errors.osiiscode_id}
                value={data.osiiscode_id}
                onChange={e => setData('osiiscode_id', e.target.value)}
                options={[
                  {
                    value: '',
                    label: ''
                  },
                  ...osiis_codes.map(osiis => ({
                    value: String(osiis.id),
                    label: osiis.diagnosis + ' - ' + osiis.Abr
                  }))
                ]}
              />
            </FieldGroup>

          </div>
          <div className="flex items-center justify-end px-8 py-4 bg-gray-100 border-t border-gray-200">
            <LoadingButton
              loading={processing}
              type="submit"
              className="btn-indigo"
            >
              Create Player Injury
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  )
}

Create.layout = (page: React.ReactNode) => <MainLayout children={page} />;

export default Create;
