function imagePreview() {
  const sampul = document.querySelector("#sampul");
  const labelSampul = document.querySelector(".custom-file-label");
  const imagePreview = document.querySelector(".img-preview");

  labelSampul.textContent = sampul.files[0].name;

  const fileSampul = new FileReader();
  fileSampul.readAsDataURL(sampul.files[0]);
  fileSampul.onload = (e) => {
    imagePreview.src = e.target.result;
  };
}

function imageSlider() {
  const slider = document.querySelector("#slider_img");
  const sliderLabel = document.querySelector(".custom-file-label-slider");
  const sliderPreview = document.querySelector(".img-slider-preview");

  sliderLabel.textContent = slider.files[0].name;
  const fileSlider = new FileReader();
  fileSlider.readAsDataURL(slider.files[0]);
  fileSlider.onload = (e) => {
    sliderPreview.src = e.target.result;
  };
}
