using System;

namespace MyApplication
{
    class Program
    {
        static void Main(string[] args)
        {
            string[] langs = {"C", "C#", "C++", "Python", "Java", "PHP", "Assembly", "Rust", "R"};
            int i = 0;
            // int balance = 200;
            Console.WriteLine("Welcome to the program language shop!");
            Console.WriteLine("What can i get you?");

            Console.WriteLine("This is what we got:");
            do
            {
                Console.WriteLine(langs[i]);
                i++;
            }
            while(i < langs.Length);
        }
    }
}
