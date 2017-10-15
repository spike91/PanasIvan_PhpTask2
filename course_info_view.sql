CREATE OR REPLACE VIEW courses.get_courses_info
AS SELECT course.course_id, course_code, course_name, course_description, 
(
SELECT code_student || ',' || firstname  || ',' || lastname  || ',' || personal_id  || ',' || code_group || ';'
FROM courses.tstudent stud
JOIN courses.tcourse_student co_st ON co_st.student_id_fk = stud.student_id
WHERE co_st.course_id_fk = course.course_id) Students,
(
SELECT language_id || ',' || language_name || ';'
FROM courses.tlanguage lan
JOIN courses.tcourse_language co_la ON co_la.language_id_fk = lan.language_id
WHERE co_la.course_id_fk = course.course_id
) Languages
FROM courses.tcourse course