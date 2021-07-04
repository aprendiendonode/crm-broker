var selectedRows = [];
var floatModal = document.getElementById('floatBar');
var lastmodal = '';

function viewFloatModal(id) {
   floatModal.classList.add('viewModal')
   if (selectedRows.includes(id) == true) {
      const removeRow = selectedRows.indexOf(id);
      if (removeRow > -1) {
         selectedRows.splice(removeRow, 1);
         if (selectedRows.length == 0) {
            floatModal.classList.remove('viewModal')
            if (lastmodal !== '') {
               document.getElementById(lastmodal).classList.remove('viewModal');
               let modal = document.getElementById(modalID);
               modal.classList.add('viewModal');
               lastmodal = modalID;
            }
         }
      }
   } else {
      selectedRows.push(id)
   }



   
}

function viewModal(modalID) {
   if (lastmodal !== modalID && lastmodal !== '') {
      document.getElementById(lastmodal).classList.remove('viewModal');
      let modal = document.getElementById(modalID);
      modal.classList.add('viewModal');
      lastmodal = modalID;
   } else {
      lastmodal = modalID;
      let modal = document.getElementById(modalID);
      modal.classList.toggle('viewModal')
   }

   if(modalID == 'markHot'){

   }
}

function closeModal(modalID) {
   let modal = document.getElementById(modalID);
   modal.classList.remove('viewModal')
   if (lastmodal !== '') {
      document.getElementById(lastmodal).classList.remove('viewModal');
      lastmodal = '';
   }
}


function markHotChange(type,url,csrf){
 

   $.ajax({
      url:url,
      type:'POST',
      data:{
         ids : selectedRows.join(','),
         type: type,
         _token :csrf
      },
      success:function(data){
         toast(data.message,'success')
      },error:function(error){

      }
   })

}
function lsmChange(url,csrf){
  
var type  = $('input[name=lsmChangeRadio]:checked', '#myform').val()

   $.ajax({
      url:url,
      type:'POST',
      data:{
         ids : selectedRows.join(','),
         type : type,
         _token :csrf
      },
      success:function(data){
         toast(data.message,'success')
      },error:function(error){

      }
   })

}
function staffChange(url,csrf,agency){
  
var staff_id  = $('.staff-from-shortcut').val()
if(staff_id == ''){
   toast('Choose Staff Please.','error')
   return false;
}

   $.ajax({
      url:url,
      type:'POST',
      data:{
         ids : selectedRows.join(','),
         staff_id : staff_id,
         _token :csrf,
         agency:agency
      },
      success:function(data){
         toast(data.message,'success')
      },error:function(error){

      }
   })

}