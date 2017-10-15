SELECT course.course_code, course.course_name, course.course_description, 
string_agg(tlanguage.language_id || ', ' || tlanguage.language_name, '; ') languages,
string_agg(student.student.code || ', '|| student.student_firstname || ', '|| student.student_lastname, '; ') students
FROM courses.tcourse course
INNER JOIN courses.tcourse_student course_st on course_st.course_id_fk = course.course_id
INNER JOIN courses.tstudent student ON course_st.student_id_fk = student.student_id
INNER JOIN courses.tcourse_language course_lan ON course.course_id = course_lan.course_id_fk
INNER JOIN courses.tlanguage ON tlanguage.language_id =  course_lan.language_id_fk
GROUP BY 1