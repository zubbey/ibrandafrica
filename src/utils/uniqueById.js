/**
 *
 * @param {Array} items
 * @returns
 */

export default function uniqueById(items) {
  const set = new Set();
  return items
    .filter((item) => {
      const isDuplicate = set.has(item.id);
      set.add(item.id);
      return !isDuplicate;
    })
    .sort((a, b) => new Date(b?.createdAt) - new Date(a?.createdAt));
}
