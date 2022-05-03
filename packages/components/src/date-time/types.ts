export type DateTimeString = string;

export type ValidDateTimeInput = Date | string | number;

export interface TimePickerProps {
	/**
	 * The initial current time the time picker should render.
	 */
	currentTime: ValidDateTimeInput;

	/**
	 * Should the time picker showed in 12 hour format or 24 hour format.
	 */
	is12Hour?: boolean;

	/**
	 * Callback function invoked when a new time has been selected.
	 */
	onChange?: ( time: DateTimeString ) => void;
}

export interface DatePickerEvent {
	/**
	 * The date of the event.
	 */
	date: Date;
}

export interface DatePickerProps {
	/**
	 * The initial current date the date picker should render.
	 */
	currentDate: ValidDateTimeInput;

	/**
	 * List of events to show in the date picker. Each event will appear as a
	 * dot on the day of the event.
	 */
	events?: DatePickerEvent[];

	/**
	 * A callback which determines whether the given date can be selected by the
	 * user.
	 */
	isInvalidDate?: ( date: Date ) => boolean;

	/**
	 * A callback invoked when selecting the previous/next month in the date
	 * picker.
	 */
	onMonthPreviewed?: ( date: DateTimeString ) => void;

	/**
	 * Callback function invoked when a new date has been selected.
	 */
	onChange?: ( date: DateTimeString ) => void;
}

export interface DateTimePickerProps extends DatePickerProps, TimePickerProps {
	/**
	 * Callback function invoked when a new date or time has been selected, or
	 * `null` when the Rest button is pressed.
	 */
	onChange?: ( date: DateTimeString | null ) => void;
}
