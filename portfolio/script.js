/**************Подмена урла без перезагрузки*************/
var old_url = window.location.href;
if(old_url.includes('?type='))
{
  var new_url = old_url.replace(/\?type=/, '');
  new_url = new_url + '/';
}

let stateObj = { id: "200" }; 
window.history.replaceState(stateObj, old_url, new_url);
/**************Подмена урла без перезагрузки*************/

Create_More_Items_System(8, 4, '.porfolio .butt_box', '.porfolio .teg_item', 'hide');

function Create_More_Items_System(number_initially_visible, delta_items, selector_button_parent, selector_item, hide_class)
{
  var all_elements = document.querySelectorAll(selector_item);
  var amount = all_elements.length;
  if(amount != 0)
  {
    if (amount  > number_initially_visible)
    {
      var j = 0;
      for (let item of all_elements)
      {
        j++;
        if(j > number_initially_visible)
        {
          item.classList.add(hide_class);
        }
      }

      var parent = document.querySelector(selector_button_parent);
      let button = document.createElement('button');
      button.id = 'more_tags';
      button.innerHTML = `
      <div class="more_name">Показать еще</div>
      <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M13 18L13 6M13 18L8 12.8571M13 18L18 12.8571" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      `;
      parent.appendChild(button);

      Click_Button_More_Items(delta_items, all_elements, button.id, 'hide');
    }
  }
}

function Click_Button_More_Items(num_records, elements_reff, id_button, hide_class)
{
  var button_id_selector = '#' + id_button;
  document.querySelector(button_id_selector).addEventListener("click", function(){
      var num = 0;
      for (let item of elements_reff)
      {
          if((item.classList.contains(hide_class)) && (num < num_records))
          {
              item.classList.remove(hide_class);
              num++;
          }
      }
      if (num == 0)
      {
          document.querySelector(button_id_selector).remove();
      }
  });
}