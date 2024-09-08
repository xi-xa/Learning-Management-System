var modal = document.getElementById('courseModal');
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


document.getElementById('saveCourseBtn').onclick = function () {
    var courseName = document.getElementById('course_name').value;
    var courseDescription = document.getElementById('course_description').value;
    var courseCode = document.getElementById('course_code').value;

    if (courseName && courseDescription && courseCode) {

        var formData = new FormData();
        formData.append('course_name', courseName);
        formData.append('course_description', courseDescription);
        formData.append('course_code', courseCode);

        fetch('submit_course.php', {
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

const editCourseModal = document.getElementById('editCourseModal');
const closeEditModalBtn = document.getElementById('closeEditModalBtn');
const cancelEditBtn = document.getElementById('cancelEditBtn');
const saveEditCourseBtn = document.getElementById('saveEditCourseBtn');

function openEditModal(course) {
    document.getElementById('edit_course_id').value = course.course_id;
    document.getElementById('edit_course_name').value = course.course_name;
    document.getElementById('edit_course_description').value = course.course_description;
    document.getElementById('edit_course_code').value = course.course_code;

    
    editCourseModal.style.display = 'flex';
}


function closeEditModal() {

    editCourseModal.style.display = 'none';
}

closeEditModalBtn.addEventListener('click', closeEditModal);
cancelEditBtn.addEventListener('click', closeEditModal);


document.getElementById('saveEditCourseBtn').addEventListener('click', function() {
    
    const courseId = document.getElementById('edit_course_id').value;
    const courseName = document.getElementById('edit_course_name').value;
    const courseDescription = document.getElementById('edit_course_description').value;
    const courseCode = document.getElementById('edit_course_code').value;

    const formData = new FormData();
    formData.append('course_id', courseId);
    formData.append('course_name', courseName);
    formData.append('course_description', courseDescription);
    formData.append('course_code', courseCode);

    fetch('update_course.php', {
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


