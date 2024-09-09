var modal = document.getElementById('sectionModal');
var openModalBtn = document.getElementById('openModalBtn');
var closeModalBtn = document.getElementById('closeModalBtn');
var cancelBtn = document.getElementById('cancelBtn');

openModalBtn.onclick = function () {
    modal.style.display = 'flex';
}


closeModalBtn.onclick = cancelBtn.onclick = function () {
    modal.style.display = 'none';
}


window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}


document.getElementById('saveSectionBtn').onclick = function () {
    var sectionName = document.getElementById('section_name').value;
    var sectionDescription = document.getElementById('section_description').value;
    var sectionCode = document.getElementById('section_code').value;

    if (sectionName && sectionDescription && sectionCode) {

        var formData = new FormData();
        formData.append('section_name', sectionName);
        formData.append('section_description', sectionDescription);
        formData.append('section_code', sectionCode);

        fetch('submit_section.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data);
                modal.style.display = 'none';
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    } else {
        alert('Please fill in all the fields');
    }
}
//edit
const editsectionModal = document.getElementById('editSectionModal');
const closeEditModalBtn = document.getElementById('closeEditModalBtn');
const cancelEditBtn = document.getElementById('cancelEditBtn');
const saveEditsectionBtn = document.getElementById('saveEditSectionBtn');

function openEditModal(section) {
    document.getElementById('edit_section_id').value = section.section_id;
    document.getElementById('edit_section_name').value = section.section_name;
    document.getElementById('edit_section_description').value = section.section_description;
    document.getElementById('edit_section_code').value = section.section_code;

    
    editsectionModal.style.display = 'flex';
}


function closeEditModal() {

    editSectionModal.style.display = 'none';
}

closeEditModalBtn.addEventListener('click', closeEditModal);
cancelEditBtn.addEventListener('click', closeEditModal);


document.getElementById('saveEditSectionBtn').addEventListener('click', function() {
    
    const sectionId = document.getElementById('edit_section_id').value;
    const sectionName = document.getElementById('edit_section_name').value;
    const sectionDescription = document.getElementById('edit_section_description').value;
    const sectionCode = document.getElementById('edit_section_code').value;

    const formData = new FormData();
    formData.append('section_id', sectionId);
    formData.append('section_name', sectionName);
    formData.append('section_description', sectionDescription);
    formData.append('section_code', sectionCode);

    fetch('update_section.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
