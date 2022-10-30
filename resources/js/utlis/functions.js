export const CalcPercent = (total, portion, decimalPlaces = 2) =>
{
    return ((portion / total) * 100).toFixed(decimalPlaces);
}

export const CalcProgressPercent = (items) =>
{
    console.log(GetOpenItems(items));
    return CalcPercent(items.length, GetOpenItems(items).length, 0);
}

export const GetCompletedItems = (items) =>
{
    return items.filter(m => m.completion_date != null);
}

export const GetOpenItems = (items) =>
{
    return items.filter(m => m.completion_date == null);
}