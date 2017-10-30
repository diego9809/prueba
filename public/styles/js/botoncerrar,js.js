/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.botoncerrar').hover(onHover, onLeave);

function onHover() {
  $(this).addClass('ti-power-off');
  $(this).text($(this).attr('on-hover'));
}
function onLeave() {
  
  $(this).text($(this).attr('on-leave'));
}
