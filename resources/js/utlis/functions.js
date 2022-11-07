export const CalcPercent = (total, portion, decimalPlaces = 2) =>
{
    let result = ((portion / total) * 100).toFixed(decimalPlaces)
    return isNaN(result) ? 0 : result;
}

export const CalcProgressPercent = (items) =>
{
    return CalcPercent(items.length, GetCompletedItems(items).length, 0);
}

export const GetCompletedItems = (items) =>
{
    return items.filter(m => m.completion_date != null);
}

export const GetOpenItems = (items) =>
{
    return items.filter(m => m.completion_date == null);
}