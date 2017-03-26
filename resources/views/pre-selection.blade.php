@extends( ($general->title === "Student")
            ? 'student' : (($general->title === "Professor")
            ? 'professor' : ($general->title === "Authority"
            ? 'authority' : 'errors/404')))
