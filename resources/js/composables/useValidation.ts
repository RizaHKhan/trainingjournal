export default function useValidations() {
    const numberRegex = new RegExp(/^[0-9]\d*$/);
    const currencyRegex = new RegExp(/^[0-9]*(\.[0-9]{0,2})?$/);
    const emailRegex = new RegExp(
        /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
    );

    const required = (val: string): string | boolean => !!val || "";

    const length =
        (len: number) =>
        (val: string): boolean | string =>
            val.length <= len || "";

    const number = (val: string): boolean | string =>
        numberRegex.test(val) || "";

    const email = (val: string): string | boolean => emailRegex.test(val) || "";

    const currency = (val: string): string | boolean =>
        currencyRegex.test(val) || "";

    const maxNum =
        (max: number) =>
        (val: number): string | boolean =>
            max >= val || `Maximum value is ${max}`;

    return { required, length, number, maxNum, currency, email };
}
