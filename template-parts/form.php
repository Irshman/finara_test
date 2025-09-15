<form action="#" method="post" class="form">

<div class="form__input">
    <input type="text" name="name" placeholder="Indtast navn" autocomplete="name" required>
</div>
<div class="form__wrap">
  <div class="form__input">
      <input type="email" name="email" placeholder="Indtast mail" autocomplete="email" required>
  </div>
  <div class="form__input cvr">
      <input type="number" name="cvr" placeholder="CVR">
  </div>
</div>
<div class="form__wrap">
  <div class="form__input">
    <input type="tel" name="phone" placeholder="Tlf. nummer" autocomplete="tel" required>
  </div>
  <div class="form__input">
      <input type="text" name="postal-code" placeholder="Postnummer" autocomplete="postal-code">
  </div>
</div>

  <details class="form__dropdown dropdown">
    <summary>Vælg industri</summary>
    <div class="dropdown__body">
        <label class="checkbox"><input type="checkbox" name="categories[]" value="option1"><span class="checkmark"></span>Årsregnskab</label>
        <label class="checkbox"><input type="checkbox" name="categories[]" value="option2"><span class="checkmark"></span>Selskabsomdannelser</label>
        <label class="checkbox"><input type="checkbox" name="categories[]" value="option3"><span class="checkmark"></span>Skattesager</label>
        <label class="checkbox"><input type="checkbox" name="categories[]" value="option4"><span class="checkmark"></span>Momssager</label>
        <label class="checkbox"><input type="checkbox" name="categories[]" value="option5"><span class="checkmark"></span>Skatterådgivning</label>
        <label class="checkbox"><input type="checkbox" name="categories[]" value="option6"><span class="checkmark"></span>Selskabsstiftelse</label>
    </div>
  </details>

  <details class="form__dropdown dropdown">
    <summary>Vælg område</summary>
    <div class="dropdown__body">
        <label class="checkbox"><input type="checkbox" name="services[]" value="service1"><span class="checkmark"></span>Årsregnskab</label>
        <label class="checkbox"><input type="checkbox" name="services[]" value="service2"><span class="checkmark"></span>Selskabsomdannelser</label>
        <label class="checkbox"><input type="checkbox" name="services[]" value="service3"><span class="checkmark"></span>Skattesager</label>
        <label class="checkbox"><input type="checkbox" name="services[]" value="service4"><span class="checkmark"></span>Momssager</label>
        <label class="checkbox"><input type="checkbox" name="services[]" value="service5"><span class="checkmark"></span>Skatterådgivning</label>
        <label class="checkbox"><input type="checkbox" name="services[]" value="service6"><span class="checkmark"></span>Selskabsstiftelse</label>
    </div>
  </details>

  <button class="form__submit btn" type="submit">Indhent tilbud</button>
</form>
