<?php

namespace source\Models;
class Enrollment extends Model
{
    const TABLE_NAME = 'class';
    const PRIMARY_KEY = 'id_class';
    const COLUMNS = ['id_class', 'id_teacher', 'id_course', 'id_schedule','name', 'color'];
}