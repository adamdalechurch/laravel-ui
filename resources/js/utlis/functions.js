export const CalcPercent = (total, portion, decimalPlaces = 2) =>
{
    return ((portion / total) * 100).toFixed(decimalPlaces);
}

export const CalcProgressPercent = (items) =>
{
    let result = CalcPercent(items.length, GetCompletedItems(items).length, 0);
    return isNaN(result) ? 0 : result;
}

export const GetCompletedItems = (items) =>
{
    return items.filter(m => m.completion_date != null);
}

export const GetOpenItems = (items) =>
{
    return items.filter(m => m.completion_date == null);
}