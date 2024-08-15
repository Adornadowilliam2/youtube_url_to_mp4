from moviepy.editor import VideoFileClip

# Load the video file
video = VideoFileClip("shiko.mp4")

# Extract audio and save as MP3
video.audio.write_audiofile("output_audio.mp3")
