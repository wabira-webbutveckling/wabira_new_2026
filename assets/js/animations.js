document.addEventListener('DOMContentLoaded', () => {
  const selector = [
    '.service-card',
    '.project-card',
    '.soft-card',
    '.pricing-card',
    '.pf-card',
    '.process-card',
    '.section-title',
    '.section-subtitle',
    '.why-img',
    '.why-illustration',
  ].join(', ');

  const elements = document.querySelectorAll(selector);

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  elements.forEach((el) => {
    el.classList.add('reveal');
    observer.observe(el);
  });
});
