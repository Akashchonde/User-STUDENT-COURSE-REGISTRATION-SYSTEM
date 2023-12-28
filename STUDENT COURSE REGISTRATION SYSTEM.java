import java.util.ArrayList;
import java.util.Scanner;

class Course {
    String courseCode;
    String title;
    String description;
    int capacity;
    String schedule;

    public Course(String courseCode, String title, String description, int capacity, String schedule) {
        this.courseCode = courseCode;
        this.title = title;
        this.description = description;
        this.capacity = capacity;
        this.schedule = schedule;
    }
}

class Student {
    String studentID;
    String name;
    ArrayList<Course> registeredCourses;

    public Student(String studentID, String name) {
        this.studentID = studentID;
        this.name = name;
        this.registeredCourses = new ArrayList<>();
    }

    public void registerForCourse(Course course) {
        if (course.capacity > 0) {
            registeredCourses.add(course);
            course.capacity--;
            System.out.println("Successfully registered for the course: " + course.title);
        } else {
            System.out.println("Sorry, the course is full. Cannot register.");
        }
    }

    public void dropCourse(Course course) {
        if (registeredCourses.contains(course)) {
            registeredCourses.remove(course);
            course.capacity++;
            System.out.println("Successfully dropped the course: " + course.title);
        } else {
            System.out.println("You are not registered for this course.");
        }
    }

    public void displayRegisteredCourses() {
        System.out.println("Registered Courses for " + name + " (ID: " + studentID + "):");
        for (Course course : registeredCourses) {
            System.out.println(course.courseCode + " - " + course.title);
        }
    }
}

public class CourseRegistrationSystem {
    private ArrayList<Course> courses;
    private ArrayList<Student> students;

    public CourseRegistrationSystem() {
        this.courses = new ArrayList<>();
        this.students = new ArrayList<>();
    }

    public void addCourse(Course course) {
        courses.add(course);
    }

    public void addStudent(Student student) {
        students.add(student);
    }

    public void displayCourseListing() {
        System.out.println("Available Courses:");
        for (Course course : courses) {
            System.out.println(course.courseCode + " - " + course.title +
                    " (Capacity: " + course.capacity + ", Schedule: " + course.schedule + ")");
        }
    }

    public static void main(String[] args) {
        CourseRegistrationSystem registrationSystem = new CourseRegistrationSystem();

        // Sample courses
        Course c1 = new Course("CSCI101", "Introduction to Computer Science", "Fundamentals of programming", 30, "MWF 10:00 AM");
        Course c2 = new Course("MATH201", "Calculus I", "Limits, derivatives, and integrals", 25, "TTH 1:30 PM");

        registrationSystem.addCourse(c1);
        registrationSystem.addCourse(c2);

        // Sample students
        Student s1 = new Student("123", "John Doe");
        Student s2 = new Student("456", "Jane Smith");

        registrationSystem.addStudent(s1);
        registrationSystem.addStudent(s2);

        // Display course listing
        registrationSystem.displayCourseListing();

        // Student registration and course removal
        s1.registerForCourse(c1);
        s1.registerForCourse(c2);
        s2.registerForCourse(c1);

        s1.displayRegisteredCourses();
        s2.displayRegisteredCourses();

        s1.dropCourse(c1);

        s1.displayRegisteredCourses();
        s2.displayRegisteredCourses();
    }
}
