document.addEventListener('DOMContentLoaded', function () {
  const phonesContainer = document.getElementById('phonesContainer');
  const scrollLeftPhones = document.getElementById('scrollLeftPhones');
  const scrollRightPhones = document.getElementById('scrollRightPhones');

  const accessoriesContainer = document.getElementById('accessoriesContainer');
  const scrollLeftAccessories = document.getElementById('scrollLeftAccessories');
  const scrollRightAccessories = document.getElementById('scrollRightAccessories');

  const scrollAmount = 240; // Amount to scroll on each arrow click

  scrollLeftPhones.addEventListener('click', () => {
    phonesContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
  });

  scrollRightPhones.addEventListener('click', () => {
    phonesContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  });

  scrollLeftAccessories.addEventListener('click', () => {
    accessoriesContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
  });

  scrollRightAccessories.addEventListener('click', () => {
    accessoriesContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  });
});
