import { cn } from "@/lib/utils";
import { useState } from "react";

export interface BlogPost {
  title: string;
  category: string;
  imageUrl: string;
  link?: string;
}

const DEFAULT_POSTS: BlogPost[] = [
  {
    title: "Color Psychology in UI: How to Choose the Right Palette",
    category: "UI/UX design",
    imageUrl:
      "https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=800&q=80",
  },
  {
    title: "Understanding Typography: Crafting a Visual Voice for Your Brand",
    category: "Branding",
    imageUrl:
      "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80",
  },
  {
    title: "Design Thinking in Practice: How to Solve Real User Problems",
    category: "Product Design",
    imageUrl:
      "https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80",
  },
];

export default function Example({
  posts = DEFAULT_POSTS,
  className,
}: {
  posts?: BlogPost[];
  className?: string;
}) {
  return (
    <>
      <style>{`
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        .blog-cards-container {
          font-family: 'Poppins', sans-serif;
        }
      `}</style>

      {/* Container with column */}
      <div className={cn("blog-cards-container flex flex-col items-center w-full", className)}>
        {/* Header */}
        <h1 className="text-3xl font-semibold text-slate-900">Latest Blog</h1>
        <p className="text-sm text-slate-500 mt-2 max-w-lg text-center">
          Stay ahead of the curve with fresh content on code, design, startups, and everything in between.
        </p>

        {/* Cards */}
        <div className="mt-10 flex flex-wrap justify-center gap-8">
          {posts.map((post, idx) => (
            <div
              key={idx}
              className="max-w-72 w-full hover:-translate-y-0.5 transition duration-300 cursor-pointer group"
            >
              <div className="overflow-hidden rounded-xl">
                <img
                  className="rounded-xl w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300"
                  src={post.imageUrl}
                  alt={post.title}
                  loading="lazy"
                />
              </div>
              <h3 className="text-base text-slate-900 font-medium mt-3 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                {post.title}
              </h3>
              <p className="text-xs text-indigo-600 font-medium mt-1 uppercase tracking-wider">
                {post.category}
              </p>
            </div>
          ))}
        </div>
      </div>
    </>
  );
}
