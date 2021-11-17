let start = 0;

function pagination() {
  let url = 'addPage.php';
  let params = new URLSearchParams('start=' + (start + 5));

  fetch(url, {
    method: 'POST',
    body: params,
  })
  .then(response => response.json())
  .then(commits => {
    let images = commits.images;
    start = +commits.start;
    let container = document.getElementById('main_container');

    for (let key in images) {
      let el = images[key];
      let a = document.createElement('a');
        a.href = `preview.php?id=${el.id}`;
        a.target = "_blank";
      container.appendChild(a);
      let img = document.createElement('img');
        img.src = el.image_path;
        img.classList.add('img');
      a.appendChild(img);
    }
  });
}