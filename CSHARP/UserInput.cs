using System;

public class User {
    public static void Main(string[] args) {
        Console.Write("Enter your username: ");
        string username = Console.ReadLine();
        Console.Write("Enter your age: ");
        int age = Convert.ToInt32(Console.ReadLine());
        Console.WriteLine("Your username is: " + username);
        Console.WriteLine("Your age is: " + age);
    }
}
