import { clsx, type ClassValue } from "clsx";
import { twMerge } from "tailwind-merge";

/**
 * Standard utility function to conditionally merge Tailwind CSS classes
 * Follows shadcn/ui convention
 */
export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}
