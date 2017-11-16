/*
 * v1.0.0
 * @author William Lin
 * @license The MIT License (MIT)
 * https://github.com/ganlanyuan/scrollTo
 */

var scrollTo = (function () {
  return function (to, duration) {
    var body = document.body,
        html = document.documentElement,
        wh = (html || body.parentNode || body).clientHeight,
        bh = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight ),
        total = to + wh,
        goal = bh - wh - 1;
        
    if (total > bh) { to = goal; }
    to = Math.round(to);

    function runScroll(element, to, duration) {
      if (duration < 0) { return; }
      var difference = to - element.scrollTop,
          perTick = difference / duration * 10,
          running;

      var run = function () {
        element.scrollTop += perTick;
        if (element.scrollTop === to) { return; }
        runScroll(element, to, duration - 10);

        running = false;
      };

      if (!running) {
        running = true;
        if (window.requestAnimationFrame) {
          window.requestAnimationFrame(run);
        } else {
          setTimeout(run, 10);
        }
      }
    }

    runScroll(document.body, to, duration);
    runScroll(document.documentElement, to, duration);
  };
})();