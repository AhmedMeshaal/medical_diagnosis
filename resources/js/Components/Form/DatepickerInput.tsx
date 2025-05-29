import { ComponentProps } from 'react';

interface DatepickerInputProps extends ComponentProps<'input'> {
  label?: string;
}

export function DatepickerInput({ label, name, ...props }: DatepickerInputProps) {
  return (
    <label className="flex items-center select-none" htmlFor={name}>
      <input
        id={name}
        name={name}
        type="date"
        className="mr-2 form-datepicker rounded text-indigo-600 focus:ring-indigo-600"
        {...props}
      />
      <span className="text-sm">{label}</span>
    </label>
  );
}
