// Формирует абсолютный путь к статике из /public.
// Пути в данных хранятся без ведущего слэша (как asset() в Laravel).
export const asset = (path: string): string => `/${path.replace(/^\/+/, '')}`;
