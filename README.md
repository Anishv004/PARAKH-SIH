
# Smart MCQ Assessment System
An advanced web-based adaptive MCQ testing system designed to deliver personalized and dynamically adjusted assessments, suitable for large-scale exams like JEE and NEET.

## Background

This system aims to enhance the assessment process by delivering online tests that measure academic and higher-order thinking skills. The assessments are designed to be reliable and unidimensional, ensuring a consistent evaluation of users' abilities. Leveraging an existing question bank, the system utilizes AI to generate and select questions, avoiding random selection and enhancing the quality of assessments.

## Objective

1. Pre-Assessment: Create a baseline knowledge assessment using MCQs to understand users' initial knowledge levels.

2. Actual Test Customization: Deliver customized MCQ assessments based on pre-assessment results, considering factors like time per question, difficulty, malpractice detection through camera, and correctness. Utilize Machine Learning for question selection.

3. Continuous Adaptation: Implement dynamic adjustments in question difficulty and content based on user progress, ensuring an adaptive learning experience.

4. User Feedback: Collect user feedback to enhance system performance and question quality, facilitating continuous improvement.

5. Adaptability for All Domains of Assessment: Ensure the system can handle various subjects and topics.

## Idea/Approach

1. Pre-Assessment: Determine baseline knowledge with MCQs.

2. Actual Test: 
    
    Provide customized questions based on pre-assessment results.

    Factors considered: Time per question, Difficulty, Malpractice detection through camera, and Correctness.

    Powered by Machine Learning for intelligent question selection.

3. Continuous Adaptation:

    Dynamic adjustments in question difficulty and content based on user progress.

    User Feedback: Collect feedback to continuously improve the system and question quality.

    Scalability: The system is designed to accommodate a large number of users simultaneously.


## Tech Stack

ML Dependencies: YOLOv3, DNN, Tensorflow, Scikit-Learn, OpenCV

PHP WebApp: HTML, CSS, JS, Bootstrap, jQuery
Architecture: MVC

Database: MySQL

Hosting Service: WAMP Server

Framework: Flask (for integration of Python dependencies)

## Outcome

Personalized Assessments: Users receive questions based on their initial knowledge level, preventing poor performance.

Tailored Training Modules: Each user gets a personalized test experience with tailored training modules.

Real-time Progress Tracking: Track progress in real-time to produce better insights from the assessment.

AI Proctoring: Normalizes difficulty by detecting malpractice through the camera.

Dynamic Difficulty Analysis: Adjusts question difficulty dynamically based on user performance.

Seamless Remote Exams: Conduct remote exams with AI-based malpractice detection for a convenient exam experience.